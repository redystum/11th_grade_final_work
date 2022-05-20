import glob
import os

lines = 0
n_file = 1
folder_path = './'
for filename in glob.glob(os.path.join(folder_path, '*.php')):
    n_file += 1
    with open(filename, 'r', encoding="utf8") as f:
        text = f.read().split('\n')
        lines = lines + len(text)

print(lines)

# Ver o numero de linhas do site