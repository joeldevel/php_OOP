<?php
declare(strict_types=1);

class AudioPlayer
{
    private int $currentVolumen;
    private string $currentFile;

    public function __construct()
    {
        $this->currentVolumen = 0;
        $this->currentFile = "";
    }

    public function getVolumen(): int
    {
        return $this->currentVolumen;
    }

    public function getFileBeingPlayed(): string
    {
        return $this->currentFile;
    }

    public function setVolumen(int $volumen): void
    {
        if($volumen > 0 || $volumen < 100 )
        {
            $this->currentVolumen = $volumen;
        }
    }

    public function setCurrentFile(string $file): void
    {
        if(strlen($file) > 0)
        {
            $this->currentFile = $file;
        }
    }
}

# Test it
$vlc = new AudioPlayer();

# This throws fatal error
# PHP Fatal error:  Uncaught Error: Cannot access private property AudioPlayer::$currentFile
# $vlc->currentFile = 'banana.mp3';

# use methods to modify  state
$vlc->setCurrentFile('banana.mp3');
$vlc->setVolumen(10);

print_r ("Playing:... \nfile: {$vlc->getFileBeingPlayed()} \nvolumen: {$vlc->getVolumen()}\n");

