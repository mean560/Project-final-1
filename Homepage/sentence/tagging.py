import sys
import nltk
import json

from nltk.corpus import state_union
from nltk.tokenize import PunktSentenceTokenizer

# from nltk.tokenize import sent_tokenize, word_tokenize

train_text = state_union.raw("2005-GWBush.txt")

# simple_text = state_union.raw("2005-GWBush.txt")

# simple_text = "i love you"

simple_text = ''
for word in sys.argv[1:]:
    simple_text += word + ' '

custom_sent_tokenizer = PunktSentenceTokenizer(train_text)
tokenized = custom_sent_tokenizer.tokenize(simple_text)

def process_content():

    for i in tokenized:
        words = nltk.word_tokenize(i)
        tagged = nltk.pos_tag(words)
        # print(tagged)
        print(json.dumps(tagged))


process_content()

# words= [word_tokenize(i) for i in sent_tokenize(simple_text)]
# pos_tag= [nltk.pos_tag(i,tagset="universal") for i in words]
# print(pos_tag)
