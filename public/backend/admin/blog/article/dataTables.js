/**
 * Created by chqss on 2016/9/16.
 */
jQuery(function ($) {
    var oTable1 = $('#article').dataTable({
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "/admin/blog/article/ajaxIndex",
        "sDom":"<'row'<'col-sm-6'l><'col-sm-6'f>>rt<'row'<'col-sm-6' i><'col-sm-6' p>>",
        "aaSorting":[],
        "sPaginationType": "bootstrap",
        "aoColumns": [
            {
                "bSortable": false,
                "mData": "id",
                "mRender":function (data,type,full) {
                    return data;
                }
            },
            {"mData":"title"},
            {"mData":"sort"},
            {"mData":"created_at"},
            {"mData":"updated_at"},
            {"mData":"actionButton"}
        ],
        "aLengthMenu": [
            [5, 10, 15, 20, 50],
            [5, 10, 15, 20, 50],
        ],
        "pageLength": 50,
        "fnDrawCallback":function (oSettings) {

        },
        "oLanguage": {
            "sUrl": "/admin/i18n"
        },
    });


    $('table th input:checkbox').on('click', function () {
        var that = this;
        $(this).closest('table').find('tr > td:first-child input:checkbox')
            .each(function () {
                this.checked = that.checked;
                $(this).closest('tr').toggleClass('selected');
            });

    });


    $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
    function tooltip_placement(context, source) {
        var $source = $(source);
        var $parent = $source.closest('table')
        var off1 = $parent.offset();
        var w1 = $parent.width();

        var off2 = $source.offset();
        var w2 = $source.width();

        if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
        return 'left';
    }
});
