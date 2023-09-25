import './App.css';
import Create from './Components/Create';
import List from './Components/List';
import './bootstrap.css';
import { useEffect, useState } from "react";
import axios from 'axios';
import DataContext from './Components/DataContext';

function App() {

  const [animals, setAnimals] = useState([]);
  const [createAnimal, setCreateAnimal] = useState(null);

  useEffect(() => {
    axios.get('http://localhost/lape/reax2server/animals')
      .then(res => {
        setAnimals(res.data);
      });
  }, []);

  useEffect(() => {
    if (null === createAnimal) return;
    axios.post('http://localhost/lape/reax2server/animals', createAnimal)
      .then(res => console.log(res.data));
  }, [createAnimal]);

  return (
    <DataContext.Provider value={{
      animals,
      setCreateAnimal
    }}>
      <div className="container">
        <div className="row">
          <Create />
          <List />
        </div>
      </div>
    </DataContext.Provider>
  );
}

export default App;
