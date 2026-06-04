import http.client
import urllib.parse
import re

conn = http.client.HTTPConnection('127.0.0.1', 8000)
conn.request('GET', '/register')
r = conn.getresponse()
print('GET', r.status, r.reason)
headers = {k.lower(): v for k, v in r.getheaders()}
print('SET-COOKIE', headers.get('set-cookie'))
body = r.read().decode('utf-8')
m = re.search(r'name="_token" value="([^"]+)"', body)
print('token', bool(m))
if not m:
    print(body[:500])
    raise SystemExit(1)
token = m.group(1)
print('csrf token', token[:20], '...')
cookie = headers.get('set-cookie', '').split(';', 1)[0]
print('cookie header', cookie)
payload = urllib.parse.urlencode({
    'name': 'Test User',
    'email': 'test1@example.com',
    'password': 'Password1!',
    'password_confirmation': 'Password1!',
    '_token': token,
})
conn.request('POST', '/register', payload, {'Content-Type': 'application/x-www-form-urlencoded', 'Cookie': cookie})
r = conn.getresponse()
print('POST', r.status, r.reason)
print('POST-HEADERS', r.getheaders())
print('BODY', r.read().decode('utf-8')[:800])
