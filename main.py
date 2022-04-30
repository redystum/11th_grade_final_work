import random
import string
import ctypes

ctypes.windll.kernel32.SetConsoleTitleA("htydrdhgrf")

def get_random_string():
    length = 42
    characters = string.ascii_letters + string.digits
    result_str = ''.join(random.choice(characters) for i in range(length))    
    return result_str

while True:
    random_text = get_random_string()
    text = f"BTC {random_text} -> 0.0000"
    print(text)