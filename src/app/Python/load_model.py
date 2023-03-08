from tensorflow.python.keras.models import load_model
from sklearn.feature_extraction.text import CountVectorizer
from doc_2_vec import MakeInputData
import sys
import os
import tensorflow as tf

def main():
 
    args = sys.argv

    input_list = []
    input_list.append(args[1])
    model = load_model('/var/www/laravel_docker/app/Python/spam_dim384_unit5_model.h5', compile=False)
    label_list = ['ham','spam']
    const = MakeInputData(input_list)
    vec, list_vec = const.sentence_bert()
  
    X_pred = vec
    y_pred = model.predict(X_pred)
    print(f"{label_list[y_pred.argmax()]}")

if __name__ == "__main__":
    main()


