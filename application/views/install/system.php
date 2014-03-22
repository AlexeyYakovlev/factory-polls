<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue" id="form_wizard_1">
            <?php echo $g_stepdesc; ?>
            <div class="portlet-body form">
                <?php
                echo Form::open('install/database', array(
                    'method' => 'post',
                    'class' => 'form-horizontal',
                    'id' => 'submit_form'
                ));
                ?>
                <div class="form-wizard">
                    <div class="form-body">
                        <?php echo $g_steps; ?>
                        <div class="tab-content">
                            <h3>Информация о системе.<br>
                                <small>Если в случае проверки системы возникнут ошибки, приложение не будет работать.</small>
                            </h3>
                            <?php if (version_compare(PHP_VERSION, '5.3.3', '>=')): ?>
                                <div class="alert alert-success">
                                    Версия PHP <?php echo PHP_VERSION ?>
                                </div>
                            <?php else: $failed = TRUE ?>
                                <div class="alert alert-danger">
                                    Версия PHP < 5.3.3
                                </div>
                            <?php endif ?>
                            <?php if (is_dir(SYSPATH) AND is_file(SYSPATH . 'classes/Kohana' . EXT)): ?>
                                <div class="alert alert-success">
                                    Системная директория <?php echo SYSPATH ?>
                                </div>
                            <?php else: $failed = TRUE ?>
                                <div class="alert alert-danger">
                                    Сконфигурированная системная директория не содержит необходимых файлов.
                                </div>
                            <?php endif ?>
                            <?php if (is_dir(APPPATH) AND is_file(APPPATH . 'bootstrap' . EXT)): ?>
                                <div class="alert alert-success">
                                    Директория приложения <?php echo APPPATH ?>
                                </div>
                            <?php else: $failed = TRUE ?>
                                <div class="alert alert-danger">
                                    Сконфигурированная директория приложения не содержит необходимых файлов.
                                </div>
                            <?php endif ?>
                            <?php if (is_dir(APPPATH) AND is_dir(APPPATH . 'cache') AND is_writable(APPPATH . 'cache')): ?>
                                <div class="alert alert-success">
                                    Директория кеша <?php echo APPPATH . 'cache/' ?>
                                </div>
                            <?php else: $failed = TRUE ?>
                                <div class="alert alert-danger">
                                    Директория кеша <?php echo APPPATH . 'cache/' ?> недоступна для записи.
                                </div>
                            <?php endif ?>
                            <?php if (is_dir(APPPATH) AND is_dir(APPPATH . 'logs') AND is_writable(APPPATH . 'logs')): ?>
                                <div class="alert alert-success">
                                    Директория лога <?php echo APPPATH . 'logs/' ?>
                                </div>
                            <?php else: $failed = TRUE ?>
                                <div class="alert alert-danger">
                                    Директория лога <?php echo APPPATH . 'logs/' ?> недоступна для записи.
                                </div>
                            <?php endif ?>
                            <?php if (!@preg_match('/^.$/u', 'n')): $failed = TRUE ?>
                                <div class="alert alert-danger">
                                    PCRE скомпилирована без поддержки UTF-8.
                                </div>
                            <?php elseif (!@preg_match('/^\pL$/u', 'n')): $failed = TRUE ?>
                                <div class="alert alert-danger">
                                    PCRE скомпилирована без поддержки Unicode.
                                </div>
                            <?php else: ?>
                                <div class="alert alert-success">
                                    PCRE скомпилирована с поддержкой UTF-8 или Unicode.
                                </div>
                            <?php endif ?>
                            <?php if (function_exists('spl_autoload_register')): ?>
                                <div class="alert alert-success">
                                    SPL скомпилирована и загружена.
                                </div>
                            <?php else: $failed = TRUE ?>
                                <div class="alert alert-danger">
                                    SPL не скомпилирована или не загружена.
                                </div>
                            <?php endif ?>
                            <?php if (class_exists('ReflectionClass')): ?>
                                <div class="alert alert-success">
                                    ReflectionClass скомпилирован и загружен.
                                </div>
                            <?php else: $failed = TRUE ?>
                                <div class="alert alert-danger">
                                    ReflectionClass не скомпилирован или не загружен.
                                </div>
                            <?php endif ?>
                            <?php if (function_exists('filter_list')): ?>
                                <div class="alert alert-success">
                                    Фильтрация данных доступна.
                                </div>
                            <?php else: $failed = TRUE ?>
                                <div class="alert alert-danger">
                                    Filter не скомпилирован или не загружен.
                                </div>
                            <?php endif ?>
                            <?php if (extension_loaded('iconv')): ?>
                                <div class="alert alert-success">
                                    Iconv скомпилирован и загружен.
                                </div>
                            <?php else: $failed = TRUE ?>
                                <div class="alert alert-danger">
                                    Iconv не скомпилирован или не загружен.
                                </div>
                            <?php endif ?>
                            <?php if (extension_loaded('mbstring')): ?>
                                <?php if (ini_get('mbstring.func_overload') & MB_OVERLOAD_STRING): $failed = TRUE ?>
                                    <div class="alert alert-danger">
                                        Расширение mbstring перегружено встроеной функцией PHP.
                                    </div>
                                <?php else: ?>
                                    <div class="alert alert-success">
                                        Mbstring скомпилирован и загружен.
                                    </div>
                                <?php endif ?>
                            <?php endif ?>
                            <?php if (!function_exists('ctype_digit')): $failed = TRUE ?>
                                <div class="alert alert-danger">
                                    CTYPE не скомпилирован или не загружен.
                                </div>
                            <?php else: ?>
                                <div class="alert alert-success">
                                    CTYPE скомпилирован и загружен.
                                </div>
                            <?php endif ?>
                            <?php if (isset($_SERVER['REQUEST_URI']) OR isset($_SERVER['PHP_SELF']) OR isset($_SERVER['PATH_INFO'])): ?>
                                <div class="alert alert-success">
                                    URI определение доступно.
                                </div>    
                            <?php else: $failed = TRUE ?>
                                <div class="alert alert-danger">
                                    URI определение недоступно.
                                </div>
                            <?php endif ?>
                            <h3>Дополнительные тесты.<br>
                                <small>Следующие расширения не требуются для запуска приложения, однако их существование может обеспечить возможность использования допоплнительных классов.</small>
                            </h3>
                            <?php if (extension_loaded('http')): ?>
                                <div class="alert alert-success">
                                    PECL HTTP доступен. Необходим в классе Request_Client_External.
                                </div>    
                            <?php else: ?>
                                <div class="alert alert-danger">
                                    PECL HTTP недоступен. Необходим в классе Request_Client_External.
                                </div>
                            <?php endif ?>
                            <?php if (extension_loaded('curl')): ?>
                                <div class="alert alert-success">
                                    cURL доступен. Необходим в классе Request_Client_External.
                                </div>    
                            <?php else: ?>
                                <div class="alert alert-danger">
                                    cURL недоступен. Необходим в классе Request_Client_External.
                                </div>
                            <?php endif ?>
                            <?php if (extension_loaded('mcrypt')): ?>
                                <div class="alert alert-success">
                                    mcrypt доступен. Необходим в классе Encrypt.
                                </div>    
                            <?php else: ?>
                                <div class="alert alert-danger">
                                    mcrypt недоступен. Необходим в классе Encrypt.
                                </div>
                            <?php endif ?>
                            <?php if (function_exists('gd_info')): ?>
                                <div class="alert alert-success">
                                    GD доступен. Необходим в классе Image.
                                </div>    
                            <?php else: ?>
                                <div class="alert alert-danger">
                                    GD недоступен. Необходим в классе Image.
                                </div>
                            <?php endif ?>
                            <?php if (function_exists('mysql_connect')): ?>
                                <div class="alert alert-success">
                                    MySQL доступен. Необходим для поддержки MySQL баз данных.
                                </div>    
                            <?php else: ?>
                                <div class="alert alert-danger">
                                    MySQL недоступен. Необходим для поддержки MySQL баз данных.
                                </div>
                            <?php endif ?>
                            <?php if (class_exists('PDO')): ?>
                                <div class="alert alert-success">
                                    PDO доступен. Необходим для поддержки дополнительных баз данных.
                                </div>    
                            <?php else: ?>
                                <div class="alert alert-danger">
                                    PDO недоступен. Необходим для поддержки дополнительных баз данных.
                                </div>
                            <?php endif ?>
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