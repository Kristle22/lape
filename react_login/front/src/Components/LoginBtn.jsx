import { useEffect, useState } from "react";
import axios from 'axios';
import { authConfig, login } from "../Functions/auth";

function LoginBtn() {

  const [auth, setAuth] = useState(null);
  const [name, setName] = useState('');
  const [pass, setPass] = useState('');

  const doLogin = () => {
    setAuth({ name, pass });
  }

  useEffect(() => {
    if (auth === null) return;
    axios.post('http://localhost/lape/react_login/server/?url=login', auth, authConfig())
      .then(res => {
        if (res.data.token) {
          login(res.data.token);
        }
        console.log(res.data);
      });

  }, [auth]);

  return (
    <>
      <div className="nice-input">
        NAME: <input type="text" value={name} onChange={e => setName(e.target.value)} />
      </div>
      <div className="nice-input">
        PASS: <input type="password" value={pass} onChange={e => setPass(e.target.value)} />
      </div>
      <button className="up" onClick={doLogin}>Login</button>
    </>
  );
}

export default LoginBtn;