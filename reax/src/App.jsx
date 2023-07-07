import { useEffect, useState } from "react";
import './App.css';
import axios from 'axios';

function App() {

  const [cats, setCats] = useState([]);

  useEffect(() => {
    console.log('GO');
  }, []);

  useEffect(() => {
    axios.get('http://localhost/lape/09/').then(res => {
      console.log(res.data);
    });
  });

  return (
    <div className="App">
      <header className="App-header">
        {
          cats.map(c => <div>{c}</div>)
        }
      </header>
    </div>
  );

}
export default App;