<?php
class Types {

    /**
     * // TODO: Add Description
     */
    private $types = [
        'REM' => '// {val}',
        
        'DELAY' => [
            'delay({val});',
            'regex' => '/[^0-9]/'
        ],

        'STRING' => [
            'type("{val}");'
        ],

        'WINDOWS|GUI|MENU|APP|SHIFT|ALT|CONTROL|CNTRL' => [
            'press("{val}")',
            'regex' => '/[^A-Z]/'
        ],

        'DOWNARROW|DOWN' => [
            'press("{arg|2}");'
        ],

        'LEFTARROW|LEFT' => [
            'press("{arg|2}");'
        ],

        'RIGHTARROW|RIGHT' => [
            'press("{arg|2}");'
        ],

        'UPARROW|UP' => [
            'press("{arg|2}");'
        ],

        'ENTER' => [
            'press("{val}");'
        ],
        
        'REPEAT' => [
            '',
            'function' => 'func_repeat',
            'regex' => '/[^0-9]/'
        ]
    ];

    /**
     * For the 'REPEAT' - command
     */
    public static function func_repeat($arg, $val, &$arr) {

        if(count($arr) === 0) {
            return 'No previous commands!';
        }

        $index = count($arr) - 1;
        $lastCommand = $arr[$index];
        
        unset($arr[$index]);
        array_push($arr, "for (var i = 0; i < $val; i++) {\n  $lastCommand\n}");

        return $arr;
    }

    public function getTypes() {
        return $this->types;
    }
}