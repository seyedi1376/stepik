<div class="back" ng-click="changeTab('main',0)"> بازگشت به صفحه اصلی</div>

<div class="row">
    <div class="col">
        <div class="card min-h-400">
            <div class="card-header text-center">
                لیست گروه های درسی
            </div>
            <div class="card-body">
                <form ng-submit="submitGroup()" class="form-inline">
                    <div style="margin-bottom: 10px" class="input-group  col-md-12">
                        <input type="text" ng-model="gTitle" class="form-control"
                               placeholder="نام گروه">

                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                ثبت
                            </button>
                        </div>
                    </div>
                </form>


                <div class="container">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>شناسه گروه</th>
                            <th>نام گروه</th>
                            <th class="text-center">حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="group in groups">
                            <td> @{{group.id}}</td>

                            <td> @{{group.title}}</td>

                            <td class="table-buttons text-center">
                                <button confirmed-click="deleteGroup(group.id)"
                                        ng-confirm-click="از حذف این مورد مطمئن هستید ؟"
                                        class="btn btn-outline-danger btn-sm"
                                        data-title="Delete" data-toggle="modal"
                                        data-target="#delete" title="حذف">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>
