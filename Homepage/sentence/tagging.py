import sys
import nltk
from colorama import Fore, Back, Style
import json

from nltk.corpus import state_union
from nltk.tokenize import PunktSentenceTokenizer

train_text = state_union.raw("2005-GWBush.txt")
# sample_text = "i love you"
sample_text = ''
for word in sys.argv[1:]:
    sample_text += word + ' '

custom_sent_tokenizer = PunktSentenceTokenizer(train_text)

tokenized = custom_sent_tokenizer.tokenize(sample_text)


def process_content():

    for i in tokenized:
        words = nltk.word_tokenize(i)
        tagged = nltk.pos_tag(words)
        # print(tagged)
        print(json.dumps(tagged))


process_content()
