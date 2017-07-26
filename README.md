# BF-MiniStringFuck-Interpreter

Just a simple interpreter for a joke esoteric programming language, except it's written in Brainfuck.  Public Domain (no copyright, no license, no attribution required :wink:)

## File Synopsis

Since there are only a few important files here, I won't bother to make a table or anything - I'll just list it all here instead.

- `interpreter.b` - **A working MiniStringFuck interpreter written in Brainfuck proven through extensive testing**
- `function.brainfuck.php` - A working Brainfuck interpreter written in PHP.  Standard implementation - `30000` unsigned, wrapping 8-bit memory cells on a non-toroidal memory tape, `EOF` treated as `byte(0)`, non-command characters simply ignored, etc.  Common extensions (`#`, `!`) **not** supported.
- `proof.php` - A PHP file containing all the test cases required to show that `interpreter.b` indeed works as expected and isn't just some BF self-interpreter copy and pasted from the Internet.
- `PHPTester-3.1.0/` - The PHPTester testing framework

### Viewing the Passing Assertions

To view all the passing assertions contained in `proof.php`, simply copy and paste all files in this Repo into a (local) server (such as MAMP) with PHP support and navigate to the file/webpage (`proof.php`) in your browser.  Please be patient though - the test cases may take around `10` seconds to execute since neither of the Brainfuck interpreter (in PHP) and the MiniStringFuck interpreter (in Brainfuck) are optimized in any way - both use rather dumb implementations, considering the commands one by one.

## MiniStringFuck (MSF) - The Language

[MiniStringFuck](http://esolangs.org/wiki/MiniStringFuck) (often abbreviated to MSF) is a Brainfuck derivative which is far from Turing-complete and is often regarded as a joke esolang since it only has `2` valid commands:

- `+`: Increment the (one and only) memory cell
- `.`: Output the byte in the (one and only) memory cell as an ASCII character

Memory-wise, it is rather similar to Brainfuck itself - MSF relies on a **single, wrapping 8-bit memory cell** whose value is unsigned.  Initially, this one and only memory cell is set to a value of `0`.

Although the official Wiki page on this Esolang does not state how to deal with non-command characters, it is assumed that all non-command characters in MSF are simply ignored.  This means that all *uncommented* MSF programs are also valid BF programs as the command set of MSF is a subset of that of Brainfuck.  However, note that most BF programs, whether commented or uncommented, do **not** behave in the same manner when interpreted as MSF since 6 of the 8 command characters in Brainfuck (`,`, `-`, `<`, `>`, `[`, `]`) are simply ignored as comments.

## Example Programs

The two example programs below are directly taken from the official Wiki page.

### MSF Hello World

Outputs the string `"Hello, World!"`.

```ministringfuck
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++.+++++++++++++++++++++++++++++.+++++++..+++.+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++.++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++.+++++++++++++++++++++++++++++++++++++++++++++++++++++++.++++++++++++++++++++++++.+++.++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++.++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++.+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++.
```

Note that this program is *much* longer than the typical Brainfuck Hello World program as a MSF program cannot rely on handy while loops, switching to another memory cell or even decrementing - if the memory cell goes over a certain value, it can only rely on cell wrapping by incrementing it near `256` times.

### A-Z

This program prints the uppercase letters `A-Z`.  Since the ASCII character codes of uppercase `A-Z` are consecutive and increasing, MSF doesn't have to rely on cell wrapping so the program length is much shorter and probably identical to a Brainfuck program that achieves the same task.

```ministringfuck
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.+.
```

## Proof of Working Interpreter

A large number of test cases have been added to confirm that `interpreter.b`, the MSF interpreter written in Brainfuck, is indeed working as expected.
