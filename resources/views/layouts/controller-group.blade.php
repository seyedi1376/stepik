<div ng-controller="GroupController">
    <div class="row">
        <div class="col">
            <div class="card min-h-400">
                <div class="card-header text-center">
                    گروه درسی
                </div>
                <div class="card-body">
                    <form ng-submit="submit()">
                        <div class="input-group mb-3">
                            <input type="text" ng-model="title" class="form-control"
                                   placeholder="گروه جدیدی وارد کنید"
                                   aria-label="گروه جدیدی وارد کنید">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"
                                        id="button-addon2">ثبت
                                </button>
                            </div>
                        </div>
                    </form>
                    <table class="table">
                        <tbody>
                        <tr ng-repeat="group in groups">
                            <th scope="row">@{{ $index + 1 }}</th>
                            <td>@{{ group.title }}</td>
                            <td class="table-buttons">
                                <button ng-click="delete(group.id)"
                                        class="btn btn-outline-danger btn-sm"
                                        data-title="Delete" data-toggle="modal"
                                        data-target="#delete" title="حذف">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>