<?php

namespace App;

use App\Exceptions\FileNotExistsException;
use App\Exceptions\FileNotReadableException;
use App\Exceptions\Exception;

class Example
{

    public function produceException()
    {
        try {

            $contents = $this->readFromFile();

        } catch (\App\Exceptions\FileNotExistsException $e) {

            // always start with the most specific exception class
            // log the error and then throw a new generic exception with a human friendly description
            throw new Exception("The data file does not exist");

        } catch (\App\Exceptions\FileException $e) {

            // classes will be considered a match if they are an ancestor of the exception class
            throw new Exception("There was a problem reading the file");

        }
    }

    /**
     * @return string
     * @throws FileNotExistsException
     * @throws FileNotReadableException
     */
    public function readFromFile(): string
    {
        $randomName = bin2hex(random_bytes(8)) . '.dat';

        if (!file_exists($randomName)) {

            throw new FileNotExistsException("File [$randomName] not found");

        }

        $contents = file_get_contents($randomName);

        if (false === $contents) {

            throw new FileNotReadableException("Failed to read [$randomName]");

        }

        return $contents;
    }

    /**
     * @return float|int
     */
    public function produceError()
    {
        return $this->thisFunctionIsNotDefined();
    }
}