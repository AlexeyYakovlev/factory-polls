<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue" id="form_wizard_1">
            <?php echo $g_stepdesc; ?>
            <div class="portlet-body form">
                <?php
                echo Form::open('install/systemcheck', array(
                    'method' => 'post',
                    'class' => 'form-horizontal',
                    'id' => 'submit_form'
                ));
                ?>
                <div class="form-wizard">
                    <div class="form-body">
                        <?php echo $g_steps; ?>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <h3 class="block">Введите логин и пароль администратора системы</h3>
                                <div class="form-group">
                                    <?php
                                    echo Form::label(
                                            'username', 'Логин<span class="required">*</span>', array(
                                        'class' => 'control-label col-md-3'
                                    ));
                                    ?>
                                    <div class="col-md-4">
                                        <?php
                                        echo Form::input('username', '', array(
                                            'class' => 'form-control',
                                            'required' => 'required',
                                            'autocopmlete' => 'off'
                                        ));
                                        ?>
                                        <span class="help-block username">Укажите логин администратора. Минимум 4 символа.</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php
                                    echo Form::label(
                                            'password', 'Пароль<span class="required">*</span>', array(
                                        'class' => 'control-label col-md-3'
                                    ));
                                    ?>
                                    <div class="col-md-4">
                                        <?php
                                        echo Form::password('password', '', array(
                                            'class' => 'form-control',
                                            'required' => 'required',
                                            'autocopmlete' => 'off'
                                        ));
                                        ?>
                                        <span class="help-block password">Укажите пароль администратора. Минимум 4 символа.</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php
                                    echo Form::label(
                                            'password', 'Подтверждение пароля<span class="required">*</span>', array(
                                        'class' => 'control-label col-md-3'
                                    ));
                                    ?>
                                    <div class="col-md-4">
                                        <?php
                                        echo Form::password('rpassword', '', array(
                                            'class' => 'form-control',
                                            'id' => 'submit_form_password',
                                            'required' => 'required',
                                            'autocopmlete' => 'off'
                                        ));
                                        ?>
                                        <span class="help-block rpassword">Подтвердите введенный пароль.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "form-actions fluid">
                        <div class = "row">
                            <div class = "col-md-12">
                                <div class = "col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn blue button-next">
                                        Далее <i class="m-icon-swapright m-icon-white"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo Form::close(); ?>
            </div>
        </div>
    </div>
</div>