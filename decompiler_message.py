s = "a\xac\u1234\u20ac\U00008000"
# ... #     ^^^^ two-digit hex escape
# ... #         ^^^^^^ four-digit Unicode escape
# ... #                     ^^^^^^^^^^ eight-digit Unicode escape

[ord(c) for c in s]

# create by sangtaik 2022.03.22
# hexa character -> cp949 string convert example
g582 = "(MCI \xbf\xa1\xb7\xaf! \xb9\xae\xc0\xda\xbf\xad\xc0\xbb \xc3\xa3\xc0\xbb \xbc\xf6 \xbe\xf8\xbd\xc0\xb4\xcf\xb4\xd9)"

fixed = g582.encode('latin1').decode('cp949')

# it will be printed : (MCI 에러! 문자열을 찾을 수 없습니다)
print(fixed)