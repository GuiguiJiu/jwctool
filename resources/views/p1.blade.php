<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>{{ env('APP_NAME') }} | p1</title>
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/theme/' . env('BOOTSTRAP_THEME') . '/bootstrap.min.css') }}">
    <!-- icons -->
    <link rel="shortcut icon" href="{{ asset('/img/fav.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('/img/fav.ico') }}" type="image/x-icon">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/_navbar.css') }}">
</head>
<body>
    @include('layouts._navbar')
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <div class="list-group">
                    <a href="#" class="list-group-item active">
                        个人信息
                    </a>
                    <a href="#" class="list-group-item">修改信息
                    </a>
                    <a href="#" class="list-group-item">更新信息
                    </a>
                </div>
            </div>
            <div class="col-sm-10">
                <form class="form-horizontal">
                    <fieldset>
                        <legend>Legend</legend>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Checkbox
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textArea" class="col-lg-2 control-label">Textarea</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" rows="3" id="textArea"></textarea>
                                <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Radios</label>
                            <div class="col-lg-10">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                        Option one is this
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                        Option two can be something else
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="select" class="col-lg-2 control-label">Selects</label>
                            <div class="col-lg-10">
                                <select class="form-control" id="select">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                                <br>
                                <select multiple="" class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
