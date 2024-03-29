function ListLine({ animal, setDelete, setModal }) {

  const handleDelete = () => {
    setDelete(animal);
  }

  const handleModal = () => {
    setModal(animal);
  }

  return (
    <li className="list-group-item" key={animal.id}>
      <div className="one-animal">
        <div className="one-animal__content">
          <b style={{
            textTransform: 'capitalize'
          }}
          >{animal.animal}</b>,
          <span>weight: {animal.weight} kg</span >
        </div>
        <div className="one-animal__buttons">
          <button type="button" className="btn btn-outline-success mr-3" onClick={handleModal}>Edit</button>
          <button type="button" className="btn btn-outline-danger" onClick={handleDelete}>Delete</button>
        </div>
      </div>
    </li>
  );

}

export default ListLine;