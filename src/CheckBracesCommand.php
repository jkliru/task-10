<?php

namespace jkliru;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use CheckBraces\CheckBraces;

class CheckBracesCommand extends Command
{
    public function configure()
    {
        $this->setName('check-braces')
            ->setDescription('This command checks string for braces')
            ->addArgument('string', InputArgument::REQUIRED, 'String');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $string = $input->getArgument('string');

        $checkBraces = new CheckBraces();

        try {
            $stringIsCorrect = $checkBraces->isCorrectString($string);

            $output->writeln("string '$string' is " . ($stringIsCorrect ? 'correct' : 'NOT correct'));
        }
        catch (\Exception $e) {
            $output->writeln("string '$string' contains illegal characters");
        }
    }
}