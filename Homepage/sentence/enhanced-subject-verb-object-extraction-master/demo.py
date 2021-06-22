import json
import sys
# from textblob import TextBlob
from subject_verb_object_extract import findSVOs, nlp

str1 = ''
for word in sys.argv[1:]:
    str1 += word + ' '

# str1 = "I have to leave now."

# str = TextBlob(str1)
# sss = str.correct()
# print(sss)

# tokens = nlp("Seated in Mission Control, Chris Kraft neared the end of a tedious Friday afternoon as he monitored a seemingly interminable ground test of the Apollo 1 spacecraft.")

tokens1 = nlp(str1)
svos1 = findSVOs(tokens1)
print(svos1)
# print(json.dumps(svos1))
# print(str1)
