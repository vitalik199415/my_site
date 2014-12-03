<div class="row">
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-home"></span></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Главная <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Вход <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <form role="form" action="/login/login" method="post" class="form-group login-form" id="login-form">
                                    <div class="input-group form-group">
                                        <input type="text" class="form-control" name="login" placeholder="Login">
                                    </div>
                                    <div class="input-group form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                    <div class="input-group form-group right">
                                        <button class="btn btn-success right" type="submit">Войти <span class="glyphicon glyphicon-log-in"></span></button>
                                    </div>
                                </form>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">Зарегистрироваться</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <div class="input-group form-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn"><button class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button> </span>
                    </div>
                </form>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>

<script>
    $(document).ready(function(){
        $("#login-form").bootstrapValidator({
            container: 'tooltip',
            messages: "Is not valid!",
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validation: 'glyphicon glyphicon-refresh'
            },
            fields: {
                login: {
                    messages: 'Login is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Login cannot be empty!'
                        },
                        stringLength: {
                            min: 3,
                            max: 30,
                            message: 'Min 3 max 30!'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9]{3,30}$/,
                            message: 'Login is not valid!'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Password cannot be empty!'
                        },
                        stringLength: {
                            min: 8,
                            message: 'Min 8 symbols!'
                        }
                    }
                }
            }
        });
    });
</script>