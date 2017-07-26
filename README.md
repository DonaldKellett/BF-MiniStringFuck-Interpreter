# BF-MiniStringFuck-Interpreter

Just a simple interpreter for a joke esoteric programming language, except it's written in Brainfuck.  Public Domain (no copyright, no license, no attribution required :wink:)

## File Synopsis

Since there are only a few important files here, I won't bother to make a table or anything - I'll just list it all here instead.

- `interpreter.b` - A working MiniStringFuck interpreter (TBC, stay tuned) written in Brainfuck

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

## Proof of Working Interpreter

A large number of test cases will be added shortly to confirm that `interpreter.b`, the MSF interpreter written in Brainfuck, is indeed working as expected.  For now, you'll just have to take my word for it :wink:
