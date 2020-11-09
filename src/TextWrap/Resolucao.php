<!DOCTYPE html>
<html lang="zxx">
<head>
     <link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>
<body>
   <div class="quebra-box">
    <?php
      
      /**
       * Verifica se esta vazio as entradas feitas pelo metodo POST do formulario e armazena.
       */
      if (!empty($_POST["texto"] && $_POST["comprimento"]))
      {

          $text = $_POST['texto'];
          $length = $_POST['comprimento'];

      }
      else
      {

          echo "preencha os campos";

      }

    /**
     * Instancia Resolucao como novo objeto.
     */
    $resolucao = new Resolucao($text, $length);

    $textResult = $resolucao->divisaoStr();

    print ($textResult);

    class Resolucao
    {
        /**
         * Declarando variaveis.
         */
        public $text;
        public $length;
        public $wholeText;
        public $charTotal;
        public $textResult;

         /**
         * O método construtor definindo os valores iniciais dos atributos do objeto.
         */
        public function __construct(string $text, int $length)
        {

            $this->text = $text;
            $this->length = $length;

        }
        /**
         * Funcao criada para realizar o processamento do texto.
         */
        public function divisaoStr()
        {
             /**
              * Exibe o limite estipulado pelo usuario de caracateres dentro de uma linha.
              */
            print ("Limite por linha: " . $this->length . " caracteres<br><br>");

            /**
             * Divide o texto em elementos formados por palavras estipuladas pelo delimitador na variavel WholeText.
             */
            $this->wholeText = explode(" ", $this->text);

            /**
             * Usa um contador para alcançar o numero de palavras.
             */
            for ($i = 0;$i < count($this->wholeText);$i++)
            {
                /**
                 * transfere elementos inseridos em cada indice de wholeText.
                 */
                $palavra = $this->wholeText[$i];

                /**
                 * para saber o limite necessario para quebra de linha é somado os caracteres de cada palavra e inserido * em charTotal.
                 */
                $this->charTotal = $this->charTotal + strlen($palavra);

                /**
                 * Compara charTotal com o limite estipulado e retorna quebra de linha somente quando o valor for maior,
                 * exibindo o respectivo texto.
                 */
                if ($this->charTotal + 1 <= $this->length)
                {

                    if ($i == 0)
                    {

                        $this->textResult = $this->textResult . $palavra;

                    }
                    else
                    {

                        $this->textResult = $this->textResult . " " . $palavra;

                    }

                }
                elseif ($this->charTotal + 1 > $this->length)
                {

                    $this->charTotal = 0;

                    $this->textResult = $this->textResult . "<br>" . $palavra . " ";
                }

            }

            return $this->textResult;
        }

    }
    ?>
        <br><br>
        <a href="index.php">Voltar</a>
    </div>
</body>