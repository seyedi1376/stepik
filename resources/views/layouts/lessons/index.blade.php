<div class="back" ng-click="changeTab('main',0)"> بازگشت به صفحه اصلی</div>
<div class="row">
        <div class="col">
            <div class="card min-h-400">
                <div class="card-header text-center">
                    نمایش دروس
                </div>
                <div class="card-body">
                    <div class="container">
                        <table  class="table table-striped" >
                            <thead>
                            <tr>
                                <th>شناسه درس</th>
                                <th>نام درس</th>
                                <th>کد درس</th>
                                <th class="text-center">حذف</th>
                                <th class="text-center">ویرایش</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="lesson in lessons">
                                <td> @{{lesson.id}}</td>

                                <td> <a class="nav-link" ng-click="changeTab('show', lesson.id)" href="#">
                                        <p scope="row"> @{{lesson.title}}</p></a></td>

                                <td> @{{lesson.score}}</td>
                                <td class="table-buttons text-center" >
                                    <button confirmed-click="delete(lesson.id)" ng-confirm-click="از حذف این مورد مطمئن هستید ؟"
                                            class="btn btn-outline-danger btn-sm"
                                            data-title="Delete" data-toggle="modal"
                                            data-target="#delete" title="حذف">
                                        <i class="fa fa-trash"></i>
                                    </button>

                                </td>
                                <td class="table-buttons text-center">
                                        <button ng-click="changeTab('edit' , lesson.id )" class="btn btn-outline-danger btn-sm" data-title="edit" data-toggle="modal" title="ویرایش">
                                            <i class="fas fa-pencil-alt"></i>
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
