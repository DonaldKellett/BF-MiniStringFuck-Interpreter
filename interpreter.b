[
  MiniStringFuck (MSF) Interpreter in Brainfuck
  Author: @DonaldKellett (Donald Leung)
  https://github.com/DonaldKellett
  Public Domain (no license, no copyright, no attribution required :D)
]

,                                                 Read first byte of input
[                                                 Input loop; breaks when EOF (byte(0)) reached
  [->+>+<<]                                       Copy input from cell #0 to cells #1 and #2
  -                                               Decrement cell #0; set it to byte(255) as marker
  >>                                              Move to cell #2
  -------------------------------------------     Take away 43 from cell #2; if cell #2 is byte(43) (plus sign) then it would be set to 0
  [[-]<<+>>]                                      If cell #2 is not plus sign then truncate to 0 anyway; remove marker (set marker back to 0)
  <<                                              Goto cell #0 (marker)
  [[+]>>>>+<<<<]                                  If marker is nonzero then command was plus sign; truncate marker and increment MSF memory cell in this case
  >                                               Goto cell #1
  [->>+<<]                                        Copy contents of cell #1 to cell #3
  >>                                              Goto cell #3
  [-<+<+>>]                                       Copy contents of cell #3 to cells #1 and #2
  <                                               Goto cell #2
  ----------------------------------------------  Decrement cell #2 by 46; if cell #2 is print command then this is truncated to byte(0)
  <<                                              Goto cell #0
  -                                               Set cell #0 as marker (byte(255))
  >>                                              Goto cell #2
  [[-]<<+>>]                                      If cell #2 nonzero then truncate cell #2 and destroy marker
  <<                                              Goto cell #0 (marker)
  [[+]>>>>.<<<<]                                  If marker nonzero then command was print; in that case print byte from MSF memory cell
  >                                               Goto cell #1
  [-]                                             Truncate cell #1 to byte(0) which reinitializes the BF memory tape
  <                                               Goto cell #0
  ,                                               Read next byte of input
]                                                 End of input loop
