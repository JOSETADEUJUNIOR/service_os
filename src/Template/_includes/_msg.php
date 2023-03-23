<?php

if (isset($ret)) {

    switch ($ret):

        case -3:
            echo '
            <script>
               MensagemSenhaInvalida();
            </script>';

            break;
        case -4:
            echo '
            <script>
               MensagemLoginInvalido();
            </script>';

            break;
        case -10:
            echo '
            <script>
               MensagemLoginInvalido();
            </script>';

            break;
        case -1:
            echo '
            <script>
                MensagemErro();
            </script>';

            break;

        case 0:

            echo '
                <script>
                    MensagemCamposObrigatorios();
                </script>';
            break;

        case 1:
            echo '
            <script>
                MensagemSucesso();
            </script>';
            break;

    endswitch;
}
