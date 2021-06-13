import sys
# import json
from textblob import TextBlob

old_text = ""
for word in sys.argv[1:]:
    old_text += word + ' '
# print(old_text)
# old_text = "I love you"

ab = TextBlob(old_text)
new_text = ab.correct()

# print("Are you mean '")
print(new_text)
# print("' ?")

# json.dumps(new_text)