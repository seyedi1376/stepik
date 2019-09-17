<div class="back" ng-click="changeTab('list',0)"> بازگشت به لیست دروس</div>

<div class="row">
    <div class="col">
        <div class="card min-h-400">
            <div class="card-header text-center">
                ویرایش درس
            </div>
            <div class="card-body">
                <form ng-submit="edit()" class="form-inline">
                    <div style="align-items: center" class=" mb-3">
                        <label>نام درس</label>
                        <input type="text" ng-model="title" class="form-control"
                               placeholder="نام درس">
                    </div>
                    <div style="align-items: center" class=" mb-3">
                        <label>امتیاز</label>
                        <input type="number" ng-model="score" class="form-control"
                               placeholder="امتیاز">
                    </div>
                    <div style="align-items: center" class=" mb-3">
                        <label>کد درس</label>
                        <input type="number" ng-model="code" class="form-control"
                               placeholder="کد درس">
                    </div>
                    <div style="align-items: center" class=" mb-3">
                        <label>قیمت درس</label>
                        <input type="number" ng-model="price" class="form-control"
                               placeholder="قیمت درس ">
                    </div>
                    <div style="align-items: center" class=" mb-3">
                        <label>طبقه بندی</label>
                        <select class="form-control" style="width: 71%;" ng-model="level">
                            <option value="university" selected>دروس دانشگاهی</option>
                            <option value="school">دروس مدارس</option>
                            <option value="it">دروس آی تی</option>
                            <option value="public">دروس عمومی</option>
                        </select>
                    </div>

                    <div style="align-items: center" class=" mb-3">
                        <label>گروه درسی</label>
                        <select class="form-control" style="width: 71%;" ng-model="groupN" >
                            <option ng-repeat="group in groups" value="@{{group.id}}">@{{group.title}}</option>
                        </select>
                    </div>
                    <div style="align-items: center" class=" mb-3">
                        <label>برچسب  درس</label>
                        <input type="text" ng-model="tagN" class="form-control"
                               placeholder="برچسب درس ">
                        <option ng-repeat="tag in tags" value="@{{tag.id}}">@{{tag.title}}</option>
                    </div>
                    <div style="align-items: center;margin-bottom: 15px" class="col-md-11" >
                        <label>توضیحات</label>
                        <textarea ng-model="description" style="width: 100%" rows="5" class="description ckeditor"
                                  placeholder="توضیحات">
                                            </textarea>

                    </div>
                    <div style="align-items: center" class=" mb-3">

                        <label> نمایش برای کاربران <input type="checkbox" ng-model="showToUser" ng-checked="showToUser == 1" ng-true-value="1" ng-false-value="0" class="form-control"
                                                          placeholder=" نمایش برای کاربران"> </label>



                    </div>

                    <button class="btn btn-primary" type="submit"
                            id="button-add">ویرایش
                    </button>
                </form>


            </div>
        </div>
    </div>
</div>
