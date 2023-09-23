import './App.css';
import Create from './Components/Create';
import List from './Components/List';
import './bootstrap.css';
import { useEffect, useState } from "react";
import axios from 'axios';

function App() {

  const [animals, setAnimals] = useState([]);

  useEffect(() => {
    axios.get('http://localhost/lape/reax2server/animals').then(res => {
      console.log(res);
      setAnimals(res.data);
    });
  }, []);

  return (
    <div className="container">
      <div className="row">
        <Create />
        <List animals={animals} />
      </div>
    </div>
  );
}

export default App;
