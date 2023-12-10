<?php

namespace App\Livewire\Traits;

trait ProfanityChecker
{
     public function censorCurseWords($content)
    {
        $curseWords = [
            'fuck',
            'shit',
            'bullshit',
            'fucking',
            'puta',
            'putang',
            'putangina',
            'nakputa',
            'bugok',
            'aydamo',
            'tanaydamo',
            'tanaydana',
            'dana',
            'gago',
            'tarantado',
            'kingina',
            'tangina',
            'tanginang',
            'kinginang',
            'gagong',
            'nakputang',
            'whore',
            'asshole',
            'fucker',
        ];  // Replace with actual curse words

        foreach ($curseWords as $curseWord) {
            if (stripos($content, $curseWord) !== false) {
                throw new \Exception('Profanity detected');
            }
        }

        return $content;
    }
}
