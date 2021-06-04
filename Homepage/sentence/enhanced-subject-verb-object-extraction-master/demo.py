import json
import sys
from subject_verb_object_extract import findSVOs, nlp

str1 = ''
for word in sys.argv[1:]:
    str1 += word + ' '


# str1 = "I like cats, and Sam also likes cats because they are lovely."
# tokens = nlp("Seated in Mission Control, Chris Kraft neared the end of a tedious Friday afternoon as he monitored a seemingly interminable ground test of the Apollo 1 spacecraft.")



tokens1 = nlp(str1)
svos1 = findSVOs(tokens1)
# print(svos1)
print(json.dumps(svos1))