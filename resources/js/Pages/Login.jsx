import { usePage, Head } from '@inertiajs/inertia-react';
import { Inertia } from '@inertiajs/inertia';
import React, { useState } from 'react';
// import Form from './Main/Form';
import '../../css/style.css';


export default function Login() {
    const { error } = usePage().props.errors;
    const [idAdmin, setIdAdmin ] = useState();
    const [nis, setNis ] = useState(); 
    const [nip, setNip ] = useState(); 
    const [password, setPassword ] = useState(); 
    
    const [formAdminVisible, setFormAdminVisible] = useState(false);
    const [formSiswaVisible, setFormSiswaVisible] = useState(false);
    const [formGuruVisible, setFormGuruVisible] = useState(false);

    const handleLoginAdmin = () => {
        Inertia.post('/login/admin', {
            idAdmin,
            password
        });
    };
    const handleLoginSiswa = () => {
        Inertia.post('/login/siswa', {
            nis,
            password
        });
    };
    const handleLoginGuru = () => {
        Inertia.post('/login/guru', {
            nip,
            password,
         });
    };

    return (
    <>
        <Head title="login" />

        <div className="header">
            <img src="/gambar/header.jpg" alt="header.jpg" height="40%" width="100%" />
        </div>
        <div className="menu">
            <b><a href="#" className="active">Home</a></b>
        </div>
        <div className="kiri-atas">
            <fieldset>
                <legend></legend>
                <center>
                    <button 
                        className="button-primary"
                        onClick={() => {
                           setFormAdminVisible(!formAdminVisible);
                           setFormSiswaVisible(false);
                           setFormGuruVisible(false);
                        }}
                        >
                        Admin
                    </button>
                    <button 
                        className="button-primary"
                        onClick={() => {
                          setFormAdminVisible(false);
                          setFormSiswaVisible(!formSiswaVisible);
                          setFormGuruVisible(false);
                       }}
                       >
                       Siswa
                    </button>
                    <button 
                        className="button-primary"
                        onClick={() => {
                          setFormAdminVisible(false);
                          setFormSiswaVisible(false);
                          setFormGuruVisible(!formGuruVisible);
                       }}
                       >
                       Guru
                    </button>
                    <hr />
                    <b>Login sesuai dengan anda</b>
                    <hr />
                </center>
                {/* FORM LOGIN ADMIN */}
                <div 
                    style={{ display: formAdminVisible ? 'block' : 'none' }}
                >
                    <center>
                      <b>Login Admin</b>
                      <p>{error}</p>
                    </center>
                    <table>
                      <tr>
                        <td width="25%">Kode Admin</td>
                        <td width="25%">
                          <input
                             type="text"
                             onChange={(e) =>
                                  setIdAdmin(e.target.value)
                             }
                          />
                        </td>
                      </tr>
                      <tr>
                        <td width="25%">Password</td>
                        <td width="25%">
                          <input
                             type="password"
                             onChange={(e) =>
                                  setPassword(e.target.value)
                             }
                          />
                        </td>
                      </tr>
                      <tr>
                        <td colSpan="2">
                          <center>
                            <button
                                className="button-primary"
                                type="button"
                                onClick={() => handleLoginAdmin()}
                                >
                                Login
                            </button>
                          </center>
                        </td>
                      </tr>
                    </table>
                 </div>

                 {/* FORM LOGIN SISWA */}
                <div 
                    style={{ display: formSiswaVisible ? 'block' : 'none' }}
                >
                    <center>
                      <b>Login Siswa</b>
                      <p>{error}</p>
                    </center>
                    <table>
                      <tr>
                        <td width="25%">NIS</td>
                        <td width="25%">
                          <input
                             type="text"
                             onChange={(e) =>
                                  setNis(e.target.value)
                             }
                          />
                        </td>
                      </tr>
                      <tr>
                        <td width="25%">Password</td>
                        <td width="25%">
                          <input
                             type="password"
                             onChange={(e) =>
                                  setPassword(e.target.value)
                             }
                          />
                        </td>
                      </tr>
                      <tr>
                        <td colSpan="2">
                          <center>
                            <button
                                className="button-primary"
                                type="button"
                                onClick={() => handleLoginSiswa()}
                                >
                                Login
                            </button>
                          </center>
                        </td>
                      </tr>
                    </table>
                 </div>

                 {/* FORM LOGIN GURU */}
                <div 
                    style={{ display: formGuruVisible ? 'block' : 'none' }}
                >
                    <center>
                      <b>Login Guru</b>
                      <p>{error}</p>
                    </center>
                    <table>
                      <tr>
                        <td width="25%">NIP</td>
                        <td width="25%">
                          <input
                             type="text"
                             onChange={(e) =>
                                  setNip(e.target.value)
                             }
                          />
                        </td>
                      </tr>
                      <tr>
                        <td width="25%">Password</td>
                        <td width="25%">
                          <input
                             type="password"
                             onChange={(e) =>
                                  setPassword(e.target.value)
                             }
                          />
                        </td>
                      </tr>
                      <tr>
                        <td colSpan="2">
                          <center>
                            <button
                                className="button-primary"
                                type="button"
                                onClick={() => handleLoginGuru()}
                                >
                                Login
                            </button>
                          </center>
                        </td>
                      </tr>
                    </table>
                 </div>
            </fieldset>
        </div>

        <div className="kanan">
            <center>
                <h1>SELAMAT DATANG
                    <br />
                    DI WEB PENILAIAN SMKN 1 CIBINONG
                </h1>
            </center>
        </div>

        <div className="kiri-bawah">
            <center>
                <p className="mar">Gallery</p>
                <div className="gallery">
                    <img src="/gambar/rpl.jpg" alt="rpl.jpg" />
                    <div className="deskripsi">SMK BISA</div>
                </div>
            </center>
        </div>
    </>
  )
}