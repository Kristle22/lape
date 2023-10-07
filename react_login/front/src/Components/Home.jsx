import { useEffect, useState } from "react";
import axios from 'axios';
import { authConfig } from '../Functions/auth';

function Home() {

  const [list, setList] = useState([]);

  useEffect(() => {
    axios.get('http://localhost/lape/react_login/server/?url=home', authConfig())
      .then(res => setList(res.data));
  }, []);

  return (
    <>
      <h1>Welcome, my Dear, to our Home Page!</h1>
      <ul> {list ?
        list.map((l, i) => <li key={i}>{l}</li>) : null}
      </ul>
    </>
  );
}

export default Home;