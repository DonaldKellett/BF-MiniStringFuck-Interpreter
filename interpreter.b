[
  MiniStringFuck (MSF) Interpreter in Brainfuck
  Author: @DonaldKellett (Donald Leung)
  https://github.com/DonaldKellett
  Public Domain (no license, no copyright, no attribution required :D)
]

,                                                 Read first byte of input
[                                                 While EOF not reached
  [->+>+<<]                                       (Destructive) copy contents of cell #0 to cells #1 and #2
  -                                               Set "flag" at cell #0 by assigning byte(255) to it
  >                                               Move to cell #1
  -------------------------------------------     Decrement 43; if current character is increment command then the cell will be set to 0
  [[-]<+>]                                        If current character is not increment command then truncate current cell and remove "flag"
  <                                               Goto cell #0 (flag)
  [[+]>>>+<<<]                                    If flag not destroyed then increment MSF memory cell
  -                                               Set flag again for print command comparison
  >>                                              Goto cell #2
  ----------------------------------------------  Decrement 46; if current character is print command then cell will be set to 0
  [[-]<<+>>]                                      If current character not print command then truncate cell and destroy flag
  <<                                              Goto cell #0 (flag)
  [[+]>>>.<<<]                                    If flag not destroyed then output byte at MSF memory cell (and destroy flag)
  ,                                               Read next byte of input
]                                                 End while
