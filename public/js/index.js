var app = angular.module('ToDoApp', []);
app.directive('ngConfirmClick', [
    function () {
        return {
            link: function (scope, element, attr) {
                var msg = attr.ngConfirmClick || "Are you sure?";
                var clickAction = attr.confirmedClick;
                element.bind('click', function (event) {
                    if (window.confirm(msg)) {
                        scope.$eval(clickAction)
                    }
                });
            }
        };
    }]);
app.controller('MainController', function ($scope) {
    $scope.tabs = {
        'lessonTab': false,
        'syllabusTab': false,

    };
    $scope.changeTab = function (tab, id = null) {
        if (id) {
            localStorage.setItem('id', id);
        }
        angular.forEach($scope.tabs, function (key, value) {
            $scope.tabs[value] = false;
        });
        angular.forEach($scope.tabs, function (key, value) {
            if (value === tab) {
                $scope.tabs[tab] = true;
            }
        });
    }
});
app.controller('LessonController', function ($scope, $http) {
    $scope.id = '0';
    $scope.title = "";
    $scope.gTitle = "";
    $scope.tTitle = "";
    $scope.code = '';
    $scope.price = '';
    $scope.score = '';
    $scope.showToUser = '0';
    $scope.level = 'university';
    $scope.description = '';
    $scope.lessons = [];
    $scope.groups = [];
    $scope.tags = [];
    $scope.groupN = '';
    $scope.tagN = '';
    $scope.tab = 'main';

    $scope.getText = function(text) {
        if (text === 'public')
            return 'طبقه بندی درس : دروس عمومی'
        if (text === 'it')
            return 'طبقه بندی درس : دروس آی تی'
        if (text === 'school')
            return 'طبقه بندی درس : دروس مدارس'
        if (text === 'university')
            return 'طبقه بندی درس : دروس دانشگاهی'
    }
    $scope.submit = function () {
        $http.post("http://localhost:8000/api/lessons", {
            title: $scope.title,
            code: $scope.code,
            score: $scope.score,
            groupId: $scope.groupN,
            tagN: $scope.tagN,
            courseLevel: $scope.level,
            price: $scope.price,
            showToUser: $scope.showToUser,
            description: appEditor.getData(),
        })
            .then(
                function successCallback(response) {
                    $scope.changeTab('list','0')

                    alert('اطلاعات با موفقیت ثبت شد');
                },
                function errorCallback(response) {
                    console.log(response);
                }
            );
    };
    $scope.getData = function () {
        $http.get("http://localhost:8000/api/lessons")
            .then(
                function successCallback(response) {
                    $scope.lessons = response.data;
                    console.log(response.data);

                },
                function errorCallback(response) {
                    console.log("مشکلی در ارتباط با سرور پیش آمده است");
                }
            );
    };

    $scope.getLesson = function () {
        $http.get("http://localhost:8000/api/lessons/" + $scope.id)
            .then(
                function successCallback(response) {
                    console.log(response);
                    $scope.getGroups()
                    $scope.getTags()
                    $scope.title = response.data.title,
                        $scope.code = response.data.code,
                        $scope.price = response.data.price,
                        $scope.groupN = response.data.groupId + '',
                        $scope.tagN = response.data.tagN + '',
                        $scope.level = response.data.courseLevel,
                        $scope.score = response.data.score,
                        $scope.showToUser = response.data.showToUser,
                        $scope.description = response.data.description

                },
                function errorCallback(response) {
                    console.log(response);
                }
            );
    };
    $scope.getLesson();

    $scope.clearField = function() {
        $scope.title = '',
            $scope.code = '',
            $scope.price = '',
            $scope.groupN = '',
            $scope.tagN = '',
            $scope.level = '',
            $scope.score = '',
            $scope.showToUser = '',
            $scope.description = ''
    };
    $scope.edit = function () {
        $http.put("http://localhost:8000/api/lessons/" + $scope.id, {
            title: $scope.title,
            code: $scope.code,
            score: $scope.score,
            groupId: $scope.groupN,
            tagN: $scope.tagN,
            courseLevel: $scope.level,
            price: $scope.price,
            showToUser: $scope.showToUser,
          // description: appEditor.getData(),
            description:$scope.description,

        })
            .then(
                function successCallback(response) {
                    console.log($scope.res)
                    $scope.changeTab('list','0')

                    alert('اطلاعات با موفقیت ویرایش شد');


                },
                function errorCallback(response) {
                    console.log(response)

                }
            );
    };
    $scope.delete = function (id) {
        $http.delete("http://localhost:8000/api/lessons/" + id)
            .then(
                function successCallback(response) {
                    $scope.getData();
                    $scope.changeTab('list','0')
                },
                function errorCallback(response) {
                    console.log("مشکلی در ارتباط با سرور پیش آمده است");
                }
            );
    };

    $scope.changeTab = function (t, i) {
        if (i === 0)
            $scope.clearField();
        $scope.id =  i;
        $scope.tab = t
        if (t === 'edit')
            $scope.getLesson()
        if (t === 'list')
            $scope.getData()
        if (t === 'createGroup')
            $scope.getGroups()
        if (t === 'create')
            $scope.getGroups()
        if(t === 'show')
            $scope.getLesson()

    }


    $scope.getGroups = function () {
        $http.get("http://localhost:8000/api/groups")
            .then(
                function successCallback(response) {
                    $scope.groups = response.data;
                },
                function errorCallback(response) {
                    console.log(response);
                }
            );
    };

    $scope.submitGroup = function () {
        $http.post("http://localhost:8000/api/groups", {
            title: $scope.gTitle,
        })
            .then(
                function successCallback(response) {
                    $scope.getGroups();
                    alert('اطلاعات با موفقیت ثبت شد');
                },
                function errorCallback(response) {
                    console.log(response);
                }
            );
    };


    $scope.deleteGroup = function (id) {
        $http.delete("http://localhost:8000/api/groups/" + id)
            .then(
                function successCallback(response) {
                    $scope.getGroups();
                    alert('اطلاعات با موفقیت حذف شد');
                },
                function errorCallback(response) {
                    console.log(response);
                }
            );
    };
    $scope.getTags = function () {
        $http.get("http://localhost:8000/api/tags")
            .then(
                function successCallback(response) {
                    $scope.tags = response.data;
                },
                function errorCallback(response) {
                    console.log(response);
                }
            );
    };

    $scope.submitTag = function () {
        $http.post("http://localhost:8000/api/tags", {
            title: $scope.tTitle,
        })
            .then(
                function successCallback(response) {
                    $scope.getTags();
                    alert('اطلاعات با موفقیت ثبت شد');
                },
                function errorCallback(response) {
                    console.log(response);
                }
            );
    };


    $scope.deleteTag = function (id) {
        $http.delete("http://localhost:8000/api/tags/" + id)
            .then(
                function successCallback(response) {
                    $scope.getTags();
                    alert('اطلاعات با موفقیت حذف شد');
                },
                function errorCallback(response) {
                    console.log(response);
                }
            );
    };


});
app.controller('SyllabusController', function ($scope, $http) {
    let id = localStorage.getItem('id');
    $scope.id = '';
    $scope.main = '';
    $scope.sub = '';
    $scope.description = '';
    $scope.syllabuses = [];
    $scope.submit = function () {
        $http.post("http://localhost:8000/api/syllabus", {
            id: $scope.id,
            main: $scope.main,
            sub: $scope.sub,
            description: $scope.description
        })
            .then(
                function successCallback(response) {
                    alert('اطلاعات با موفقیت ثبت شد');
                },
                function errorCallback(response) {
                    console.log(response);
                }
            );
    };

    $scope.getData = function () {
        $http.get("http://localhost:8000/api/syllabus")
            .then(
                function successCallback(response) {
                    $scope.syllabuses = response.data;
                    console.log(response.data);

                },
                function errorCallback(response) {
                    //console.log(response.data);
                    console.log("مشکلی در ارتباط با سرور پیش آمده است");
                }
            );
    };
    $scope.getData();

    $scope.showSyllabus = function () {
        $http.get("http://localhost:8000/api/syllabus/" + $scope.id)
            .then(
                function successCallback(response) {
                    $scope.sub = response.data.sub,
                        $scope.main = response.data.main,
                        $scope.description = response.data.description,
                        $scope.id = response.data.id
                },
                function errorCallback(response) {
                    console.log(response.data);
                }
            );
    };
    $scope.showSyllabus();

    $scope.edit = function (id) {
        $http.put("http://localhost:8000/api/syllabus", +id, {
            id: $scope.id,
            main: $scope.main,
            sub: $scope.sub,
            description: $scope.description,
        })
            .then(
                function successCallback(response) {
                    $scope.res = (response.data);
                    console.log($scope.res)
                    alert('اطلاعات با موفقیت ثبت شد');
                },
                function errorCallback(response) {
                    console.log(response.data);
                }
            );
    };
    $scope.delete = function (id) {
        $http.delete("http://localhost:8000/api/syllabus/" + id)
            .then(
                function successCallback(response) {
                    $scope.getData();
                },
                function errorCallback(response) {
                    console.log("مشکلی در ارتباط با سرور پیش آمده است");
                }
            );
    };
});


app.controller('CategoryController', function ($scope, $http) {

    $scope.title = ''
    $scope.categories = ''
    $scope.getCategories = function (id) {
        $http.get("http://localhost:8000/api/categories")
            .then(
                function successCallback(response) {
                    $scope.categories = response.data;
                },
                function errorCallback(response) {
                    console.log("مشکلی در ارتباط با سرور پیش آمده است");
                }
            );
    };
    $scope.getCategories()

    $scope.submit = function () {
        $http.post("http://localhost:8000/api/categories", {
            title: $scope.title
        })
            .then(
                function successCallback(response) {
                    $scope.getCategories()
                    $scope.title = ''
                },
                function errorCallback(response) {
                    console.log("مشکلی در ارتباط با سرور پیش آمده است");
                }
            );
    };

    $scope.delete = function (id) {
        $http.delete("http://localhost:8000/api/categories/" + id)
            .then(
                function successCallback(response) {
                    $scope.getCategories();
                },
                function errorCallback(response) {
                    console.log("مشکلی در ارتباط با سرور پیش آمده است");
                }
            );
    };


});

app.controller('GroupController', function ($scope, $http) {

    $scope.title = ''
    $scope.groups = ''
    $scope.getGroups = function (id) {
        $http.get("http://localhost:8000/api/groups")
            .then(
                function successCallback(response) {
                    $scope.groups = response.data;
                },
                function errorCallback(response) {
                    console.log("مشکلی در ارتباط با سرور پیش آمده است");
                }
            );
    };
    $scope.getGroups()

    $scope.submit = function () {
        $http.post("http://localhost:8000/api/groups", {
            title: $scope.title
        })
            .then(
                function successCallback(response) {
                    $scope.getGroups()
                    $scope.title = ''
                },
                function errorCallback(response) {
                    console.log("مشکلی در ارتباط با سرور پیش آمده است");
                }
            );
    };

    $scope.delete = function (id) {
        $http.delete("http://localhost:8000/api/groups/" + id)
            .then(
                function successCallback(response) {
                    $scope.getGroups();
                },
                function errorCallback(response) {
                    console.log("مشکلی در ارتباط با سرور پیش آمده است");
                }
            );
    };


});
