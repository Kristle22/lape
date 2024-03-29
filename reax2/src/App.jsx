import './bootstrap.css';
import './App.scss';
import Create from './Components/Create';
import List from './Components/List';
import { useEffect, useState } from "react";
import axios from 'axios';
import DataContext from './Components/DataContext';
import Edit from './Components/Edit';

function App() {

  const [animals, setAnimals] = useState([]);

  const [lastUpdate, setLastUpdate] = useState(Date.now());

  const [createAnimal, setCreateAnimal] = useState(null);

  const [deleteAnimal, setDeleteAnimal] = useState(null);

  const [modalAnimal, setModalAnimal] = useState(null);
  const [editAnimal, setEditAnimal] = useState(null);

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

  useEffect(() => {
    if (null === editAnimal) return;
    axios.put('http://localhost/lape/reax2server/animals/' + editAnimal.id, editAnimal)
      .then(res => setLastUpdate(Date.now()));
  }, [editAnimal]);

  return (
    <DataContext.Provider value={{
      animals,
      setCreateAnimal,
      setDeleteAnimal,
      modalAnimal,
      setModalAnimal,
      setEditAnimal
    }}>
      <div className="container">
        <div className="row">
          <Create />
          <List />
        </div>
      </div>
      <Edit />
    </DataContext.Provider>
  );
}

export default App;
