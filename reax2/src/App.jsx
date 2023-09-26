import './App.css';
import Create from './Components/Create';
import List from './Components/List';
import './bootstrap.css';
import { useEffect, useState } from "react";
import axios from 'axios';
import DataContext from './Components/DataContext';

function App() {

  const [animals, setAnimals] = useState([]);

  const [lastUpdate, setLastUpdate] = useState(Date.now());

  const [createAnimal, setCreateAnimal] = useState(null);
  const [deleteAnimal, setDeleteAnimal] = useState(null);

  useEffect(() => {
    axios.get('http://localhost/lape/reax2server/animals')
      .then(res => {
        setAnimals(res.data);
      });
  }, [lastUpdate]);

  useEffect(() => {
    if (null === createAnimal) return;
    axios.post('http://localhost/lape/reax2server/animals', createAnimal)
      .then(res => setLastUpdate(Date.now()));
  }, [createAnimal]);

  useEffect(() => {
    if (null === deleteAnimal) return;
    axios.delete('http://localhost/lape/reax2server/animals/' + deleteAnimal.id)
      .then(res => setLastUpdate(Date.now()));
  }, [deleteAnimal]);

  return (
    <DataContext.Provider value={{
      animals,
      setCreateAnimal,
      setDeleteAnimal
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
