<?php

class Reverse
{
    public function reverseWords($input_str) {
        $words = preg_split("/\s+/", $input_str);
        $result = array();

        foreach ($words as $word) {
            $reversedWord = '';
            preg_match_all('/\p{L}+|\PL+/u', $word, $matches, PREG_PATTERN_ORDER);

            if (!empty($matches[0][0])) {
                $letters = preg_split('//u', $matches[0][0], -1, PREG_SPLIT_NO_EMPTY);

                $uppers = array_filter($letters, function($letter) {
                    return mb_strtoupper($letter, 'UTF-8') === $letter;
                });

                $upperIndices = array_map(function($letter) use ($letters) {
                    return array_search($letter, $letters);
                }, $uppers);

                $reversedLetters = array_reverse($letters);

                foreach ($reversedLetters as $index => $letter) {
                    if (in_array($index, $upperIndices)) {
                        $reversedWord .= mb_strtoupper($letter, 'UTF-8');
                    } else {
                        $reversedWord .= mb_strtolower($letter, 'UTF-8');
                    }
                }

                $result[] = $reversedWord;
            } else {
                $result[] = $word;
            }
        }

        return implode(' ', $result);
    }
}

