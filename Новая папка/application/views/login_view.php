<div class="row">
    <div class="col-md-3 col-md-offset-3">
        <h1>Вход</h1>
        <form role="form" action="" method="POST" id="login_form">
            <div class="input-group form-group">
                <span class="input-group-addon">@</span>
                <input type="text" name="login" class="form-control" placeholder="Login">
            </div>
            <div class="input-group form-group">
                <span class="input-group-addon">*</span>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <button class="btn btn-success" type="submit">Войти</button>
        </form>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#login_form').validate({
            rules: {
                login: {
                    required: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                login: {
                    required: "Поле обязательно для заполнения"
                },
                password: {
                    required: "Поле обязательно для заполнения"
                }
            }
        });
    });
</script>