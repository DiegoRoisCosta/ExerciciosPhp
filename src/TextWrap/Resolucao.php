<?php

namespace ExerciciosPhp\TextWrap;

/**
 * Implemente sua resolução nessa classe.
 *
 * Depois disso:
 * - Crie um PR no github com seu código
 * - Veja o resultado da correção automática do seu código
 * - Commit até os testes passarem
 * - Passou tudo, melhore a cobertura dos testes
 * - Ficou satisfeito, envie seu exercício para a gente! <3
 *
 * Boa sorte :D
 */
 


    class Resolucao implements TextWrapInterface
    {
        /**
         * Declarando variaveis.
         */

        public $wholeText;
        public $charTotal;
        public $textResult;
        public $textTotal;


        /**
         * Funcao criada para realizar o processamento do texto.
         */
        public function textWrap(string $text, int $length): array
        {
            /**
             * Divide o texto em elementos formados por palavras estipuladas pelo delimitador na variavel WholeText.
             */
            $this->wholeText = explode(" ", $text);

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

                if ($this->charTotal + 1 <= $length)
                {

                    if ($i == 0 )
                    {
                        $this->textResult = $this->textResult . $palavra; 

                    }


                    elseif ($i > 0) {

                        $this->textResult = $this->textResult . " " . $palavra;

                    }

                    elseif ($i > 0 && $this->charTotal == strlen($palavra + 1)) {

                        $this->textResult = $this->textResult . $palavra;

                    }
                     

                }

                elseif ($this->charTotal + 1 > $length)
                {      
      
                    
                    $this->textTotal[] = $this->textResult;
                    $this->textResult = str_replace($this->textResult, "", $this->textResult);
                    $this->charTotal = 0;
                    if ($i > 0)
                    {
                        $this->textResult = $this->textResult . $palavra; 
                        $this->textTotal[] = $this->textResult;
                        $this->textResult = str_replace($this->textResult, "", $this->textResult);
                        $this->charTotal = 0;

                    }
                }


            }
            for ($c = 0;$c < count($this->wholeText);$c++)
            {
                return $this->textTotal;

            }
        }


    }
    ?>
