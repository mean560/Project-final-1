import sys
from subject_verb_object_extract import findSVOs, nlp

str1 = ''
for word in sys.argv[1:]:
    str1 += word + ' '


# str1 = "Then there’s a development setback on top of that that pushes you even further back."


tokens1 = nlp(str1)
svos1 = findSVOs(tokens1)
print(svos1)
