<?php
/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 10/28/16
 * Time: 07:03
 */

namespace App\Repositories\Blog;


use App\Models\Blog\Commont;
use App\Repositories\IBlog\IDuoShuoRepository;
use Curl\Curl;

class DuoShuoRepository implements IDuoShuoRepository
{

    protected $curl;

    /**
     * DuoShuoRepository constructor.
     * @param $curl
     */
    public function __construct(Curl $curl)
    {
        $this->curl = $curl;
    }

    public function sync()
    {
        $pwd = request('pwd', '');
        if ($pwd != config('blog.sync_pwd'))
            return false;
        $sync_url = 'http://api.duoshuo.com/log/list.json';
        $this->curl->get($sync_url, config('duoshuo'));
        if ($this->curl->error)
            return false;
        else {
            $response = $this->curl->response;
            $response = json_decode($response, true);
            if ($response['code'] == 0) {
                foreach ($response['response'] as $item) {
                    try {
                        \DB::beginTransaction();
                        if ($item['action'] != 'delete') {
                            $common = new Commont();
                            $common->fill($item['meta']);
                            $common->saveOrFail();
                        }
                        \DB::commit();
                    } catch (\Exception $e) {
                        \DB::rollBack();
                    }
                }
            }
        }
    }
}