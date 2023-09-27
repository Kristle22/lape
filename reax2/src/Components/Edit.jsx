import { useContext, useState, useEffect } from "react";
import DataContext from './DataContext';

function Edit() {

  const { modalAnimal, setModalAnimal, setEditAnimal } = useContext(DataContext);

  const [animal, setAnimal] = useState('');
  const [weight, setWeight] = useState('');

  const close = () => {
    setModalAnimal(null);
  }

  useEffect(() => {
    if (null === modalAnimal) return;
    setAnimal(modalAnimal.animal);
    setWeight(modalAnimal.weight);

  }, [modalAnimal]);

  const handleEdit = () => {
    setEditAnimal({ id: modalAnimal.id, animal, weight });
    setModalAnimal(null);
  }

  if (null === modalAnimal) {
    return null;
  }

  return (
    <div className="modal">
      <div className="modal-dialog modal-dialog-centered">
        <div className="modal-content">
          <div className="modal-header">
            <h2 className="modal-title">Edit</h2>
            <button type="button" className="close" onClick={close}>
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div className="modal-body">
            <div className="card mt-4">
              <div className="card-body">
                <div className="form-group">
                  <label>Animal</label>
                  <input type="text" className="form-control" value={animal} onChange={e => setAnimal(e.target.value)} />
                  <small className="form-text text-muted">Please, enter some nice animal</small>
                </div>
                <div className="form-group">
                  <label>Animal weight</label>
                  <input type="text" className="form-control" value={weight} onChange={e => setWeight(e.target.value)} />
                  <small className="form-text text-muted">Please, enter animal's weight</small>
                </div>
              </div>
            </div>
          </div>
          <div className="modal-footer">
            <button type="button" className="btn btn-outline-success" onClick={handleEdit}>Save changes</button>
            <button type="button" className="btn btn-outline-secondary" onClick={close}>Close</button>
          </div>
        </div>
      </div>
    </div>
  );
}

export default Edit;