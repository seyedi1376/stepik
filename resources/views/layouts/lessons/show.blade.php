<style>
    #d1 {
        display: inline;
    }
</style>

<div class="back" ng-click="changeTab('list',0)"> بازگشت به لیست دروس</div>

<div class="row">
    <div class="col">
        <div class="card min-h-400">
            <div class="card-header text-center">
                نمایش درس
            </div>
            <div id="d1" class="card-body show-lesson">
                <div>
                    <div>نام درس : @{{title}}</div>
                    <div>امتیاز درس : @{{score}}</div>
                    <div>قیمت درس : @{{price}}</div>
                    <div>کد درس : @{{code}}</div>
                    <div>شناسه درس: @{{id}}</div>
                    <div ng-bind="getText(level)"></div>
                    <div style="width: calc(100% - 43px) !important;">توضیحات درس: @{{description}}</div>

                </div>


                <div style="text-align: center;margin-top: 15px" class="action" >


                        <div class="table-buttons text-center" >
                            <button confirmed-click="delete(id)" ng-confirm-click="از حذف این مورد مطمئن هستید ؟"
                                    class="btn btn-outline-danger btn-sm"
                                    data-title="Delete" data-toggle="modal"
                                    data-target="#delete" title="حذف">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                        <div class="table-buttons text-center">
                            <button ng-click="changeTab('edit' ,id)" class="btn btn-outline-danger btn-sm" data-title="edit" data-toggle="modal" title="ویرایش">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
