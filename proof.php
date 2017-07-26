<?php

/*
  proof.php
  A comprehensive set of test cases to show that
  `interpreter.b` works as intended
  Refer to the README for more information about `interpreter.b`
*/

// Working Brainfuck Interpreter
require 'function.brainfuck.php';
// TDD Framework
require 'PHPTester-3.1.0/class.phptester.php';
// Read BF program and store as string
$interpreter = file_get_contents('interpreter.b');

// Initialize PHPTester
$test = new PHPTester;

// Execute tests
$test->describe('The MiniStringFuck Interpreter written in Brainfuck', function () use ($test, $interpreter) {
  $test->it('should work for the two example programs provided by the official Wiki page', function () use ($test, $interpreter) {
    $test->assert_equals(brainfuck($interpreter, "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++.+++++++++++++++++++++++++++++.+++++++..+++.+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++.++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++.+++++++++++++++++++++++++++++++++++++++++++++++++++++++.++++++++++++++++++++++++.+++.++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++.++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++.+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++."), "Hello, World!");
    $test->assert_equals(brainfuck($interpreter, "+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+."), "ABCDEFGHIJKLMNOPQRSTUVWXYZ");
  });
  $test->it('should ignore all non-command characters, including: ",", "-", "<", ">", "[", "]"', function () use ($test, $interpreter) {
    $test->assert_equals(brainfuck($interpreter, "+++++sdfs++++sdf++++sdklfjsdklfdjmvncxmnxmiuroewurwio+++++++++++++2423423++234+23++234+23++342+2++24++234++++++++++++++???++++++%+++++$#$#++++++++.+++++ssdf+++++++++++++++S+SDFSFSFWWET+BCV+BC+VBN+V+X+++.+++++++.WER.+++.++++++++++++++++++WERW+ERWE++++++++++++XCV+XC++++++++++++++++CXV+XC+XCV++++++++++++++++++++++++XCVXCXCVSTTYJFGDF++++++++++++++++s+dfs+sdf++sdsd+f++SDFS+DFS+FdfsdRTETRCBVCsdfsdf++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++.++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++.+++++++++++++++++++++++++++++++++++++++++++++++++++++++.++++++++++++++++++++++++.+++.++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++.++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++.+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++."), "Hello, World!");
    $test->assert_equals(brainfuck($interpreter, "+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++.
+.
+.
+.
+.
+.
+.
+.
+.
+.
+.
+.
+.
+.
+.
+.
+.
+.
+.
+.
+.
+.
+.
+.
+.
+."), "ABCDEFGHIJKLMNOPQRSTUVWXYZ");
    $test->assert_equals(brainfuck($interpreter, "+++,++<<-+-+-->>>-+++,++,++<+--+[>-+[--+]+<<<[+,,]+++]>+++,+,+++>>+++,++>[>>>>>]++++,+,+++[+++[+++[++]+++]++[++]--,,->><]+++++++.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+."), "ABCDEFGHIJKLMNOPQRSTUVWXYZ");
    $test->assert_equals(brainfuck($interpreter, "+++n+nnn*se++*e+e+***+enn+nn+***eess+++++s**+n++++++****+++s+s++*+ww++www+**+++++s**++++www***+w+w+www+****++++s+++++www+++s+++ss+ss+ws+s+.+w.s+s.+.+.ww+.s+.sw+ssssssw.+w.+.+s.+.+.+nessew.+.+.+.+.news+.+.+.+sewn.+.sesse+.+.see+.w"), "ABCDEFGHIJKLMNOPQRSTUVWXYZ");
  });
  $test->it('should work for a program that prints out "PHP" and has trailing "+" commands (and non-command characters)', function () use ($interpreter, $test) {
    $test->assert_equals(brainfuck($interpreter, str_repeat("+", 80) . "[.]" . str_repeat("+", 248) . "[[----,,,--;;;;;;;-;-;-;,;,,;]<<<,,>>-->>->->,,;----;,,<<[<<,.>>]]" . str_repeat("+", 8) . "[[[][][]][[][[][]][][[][][][][][][][][][]]]].++++++++++++++(+++++++++++++)++++++++++++++(++++)()()"), 'PHP');
  });
});

?>
