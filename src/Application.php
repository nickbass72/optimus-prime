<?php

declare(strict_types=1);

namespace App;

use App\Exception\ApplicationException;
use App\Output\OutputInterface;
use App\Table\IntegerTableInterface;
use Exception;

class Application
{
    private IntegerTableInterface $multiplicationTable;
    private OutputInterface $output;

    public function __construct(IntegerTableInterface $multiplicationTable, OutputInterface $output)
    {
        $this->multiplicationTable = $multiplicationTable;
        $this->output = $output;
    }

    public function getOutput(): OutputInterface
    {
        return $this->output;
    }

    /**
     * @return void
     * @throws ApplicationException
     */
    public function run(): void
    {
        try {
            foreach ($this->multiplicationTable->getRowsIterator() as $row) {
                $this->output->outputLine($row->getFormatted());
            }
        } catch (Exception $exception) {
            throw new ApplicationException($exception->getMessage(), $exception->getCode(), $exception);
        }
    }
}
