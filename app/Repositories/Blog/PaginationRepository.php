<?php
/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 9/30/16
 * Time: 19:22
 */

namespace App\Repositories\Blog;


use Illuminate\Pagination\BootstrapThreePresenter;

class PaginationRepository extends BootstrapThreePresenter
{
    public function render()
    {
        if ($this->hasPages()) {
            return sprintf(
                '<nav class="center mdl-color-text--grey-50 mdl-cell mdl-cell--12-col" role="navigation"><ul class="pagination">%s %s %s</ul></nav>',
                $this->getPreviousButton('Prev'),
                $this->getLinks(),
                $this->getNextButton('Next')
            );
        }
        return '';
    }

    protected function getDisabledTextWrapper($text, $bool = true)
    {
        if ($bool) {
            return '<li class="page-item disabled"><span>' . $text . '</span></li>';
        }
        return '<li class="page-item disabled"><a class="page-link" href="javascript:;">' . $text . '</a></li>';
    }

    public function getPreviousButton($text = '&laquo;')
    {
        // If the current page is less than or equal to one, it means we can't go any
        // further back in the pages, so we will render a disabled previous button
        // when that is the case. Otherwise, we will give it an active "status".
        if ($this->paginator->currentPage() <= 1) {
            return $this->getDisabledTextWrapper($text, false);
        }

        $url = $this->paginator->url(
            $this->paginator->currentPage() - 1
        );

        return $this->getPageLinkWrapper($url, $text, 'prev');
    }

    public function getNextButton($text = '&raquo;')
    {
        // If the current page is greater than or equal to the last page, it means we
        // can't go any further into the pages, as we're already on this last page
        // that is available, so we will make it the "next" link style disabled.
        if (!$this->paginator->hasMorePages()) {
            return $this->getDisabledTextWrapper($text, false);
        }

        $url = $this->paginator->url($this->paginator->currentPage() + 1);

        return $this->getPageLinkWrapper($url, $text, 'next');
    }

    protected function getPageLinkWrapper($url, $page, $rel = null)
    {
        if ($page == $this->paginator->currentPage()) {
            return $this->getActivePageWrapper($page);
        }

        return $this->getAvailablePageWrapper($url, $page, $rel);
    }

    protected function getActivePageWrapper($text)
    {
        return '<li class="page-item active"><a class="page-link" href="javascript:;">' . $text . '</a></li>';
    }

    protected function getAvailablePageWrapper($url, $page, $rel = null)
    {
        $rel = is_null($rel) ? '' : ' rel="' . $rel . '"';
        return '<li class="page-item"><a class="page-link" href="' . htmlentities($url) . '"' . $rel . '>' . $page . '</a></li>';
    }

}