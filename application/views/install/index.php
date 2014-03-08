<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue" id="form_wizard_1">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-reorder"></i> Учтеная запись администратора - <span class="step-title">шаг 1 из 4</span>
                </div>
            </div>
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
                        <ul class="nav nav-pills nav-justified steps">
                            <li>
                                <a href="<?php echo URL::base(); ?>" class="step">
                                    <span class="number">1</span>
                                    <span class="desc"><i class="fa fa-check"></i> Учетная запись</span>   
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" class="step disabled">
                                    <span class="number">2</span>
                                    <span class="desc"><i class="fa fa-check"></i> Проверка системы</span>   
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" class="step disabled">
                                    <span class="number">3</span>
                                    <span class="desc"><i class="fa fa-check"></i> Настройки базы данных</span>   
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" class="step disabled">
                                    <span class="number">4</span>
                                    <span class="desc"><i class="fa fa-check"></i> Настройки проекта</span>   
                                </a> 
                            </li>
                        </ul>
                        <div id="bar" class="progress progress-striped" role="progressbar">
                            <div class="progress-bar progress-bar-success"></div>
                        </div>
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
                                        <?php echo Form::input('username', '', array(
                                            'class' => 'form-control',
                                            'required' => 'required'
                                            )); ?>
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
                                            'required' => 'required'
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
                                            'required' => 'required'
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