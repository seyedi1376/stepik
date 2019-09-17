<div class="lesson-management" ng-controller="LessonController">

    <div class="main-page" ng-show="tab == 'main'">
        <div class="row">


            <div class="item col-md-4 col-sm-12" style="cursor: pointer" ng-click="changeTab('createGroup' , 0)">
                <div class="card">
                    <div class="card-body text-center align-items-center">
                        <i style="display: block;font-size: 50px;margin-bottom: 20px" class="fas fa-book"></i>
                        <span> اضافه کردن گروه درسی</span>
                    </div>
                </div>
            </div>

            <div class="item col-md-4 col-sm-12" style="cursor: pointer" ng-click="changeTab('create' , '0')">
                <div class="card">
                    <div class="card-body text-center align-items-center">
                        <i style="display: block;font-size: 50px;margin-bottom: 20px" class="fas fa-plus"></i>

                        <span> اضافه کردن درس </span>
                    </div>
                </div>
            </div>

            <div class="item col-md-4 col-sm-12" style="cursor: pointer" ng-click="changeTab('list' , 0)">
                <div class="card">
                    <div class="card-body text-center align-items-center">
                        <i style="display: block;font-size: 50px;margin-bottom: 20px" class="fas fa-list"></i>

                        <span> لیست دروس </span>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="main-page" ng-show="tab == 'create'">
        @include('layouts.lessons.create')
    </div>
    <div class="main-page" ng-show="tab == 'edit'">
        @include('layouts.lessons.edit')
    </div>
    <div class="main-page" ng-show="tab == 'list'">
        @include('layouts.lessons.index')
    </div>
    <div class="main-page" ng-show="tab == 'createGroup'">
        @include('layouts.groups.create')
    </div>
    <div class="main-page" ng-show="tab == 'show'">
        @include('layouts.lessons.show')
    </div>
</div>
