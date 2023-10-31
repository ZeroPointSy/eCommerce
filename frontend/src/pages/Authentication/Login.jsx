import { useState } from "react";
import {
  Row,
  Col,
  Container,
  Image,
  Form,
  FormGroup,
  Button,
} from "react-bootstrap";
import { Link } from "react-router-dom";
import axios from '../../api/axios';
const LOGIN_URL = '/auth/login';

const Login = () => {

  const [user, setUser] = useState({
    email: "",
    password: "",
  });
  const [errMsg, setErrMsg] = useState('');

  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
        const response = await axios.post(LOGIN_URL,
            JSON.stringify( user),
            {
                headers: { 'Content-Type': 'application/json' },
                withCredentials: false
            }
        );
        console.log(JSON.stringify(response?.data));
        //console.log(JSON.stringify(response));
        const accessToken = response?.data?.data?.accessToken;
                console.log(JSON.stringify(accessToken));
                setUser({ email: "", password: "" });
    } catch (err) {
        if (!err?.response) {
            setErrMsg('No Server Response');
        } else if (err.response?.status === 400) {
            setErrMsg('Missing Username or Password');
        } else if (err.response?.status === 401) {
            setErrMsg('Unauthorized');
        } else {
            setErrMsg('Login Failed');
        }
    }
}




  return (
    <Container fluid>
      <Row className="">
        <Col className="grad vh-100 d-sm-flex d-none flex-column justify-content-center align-items-center">
          <Image
            src="../../../public/assets/signup.svg"
            className=""
            width={300}
            height={300}
            rounded
          />
          <h3 className="text-white">Public Opinion Matter</h3>
        </Col>
        <Col className="w-100 vh-100 px-md-4 px-lg-5 py-5">
          <Row className="py-5">
            <h1 className="fs-2 mb-0 text-primary">Get Started Now!</h1>
          </Row>
          <Row>
            <Form
              className="d-flex flex-column gap-4 fs-sm"
              onSubmit={handleSubmit}
            >
              
              <FormGroup className="">
                <Form.Control
                  className="form-control"
                  placeholder="Email"
                  type="email"
                  name="email"
                  value={user.email}
                  onChange={(e) => {
                    setUser({
                      ...user,
                      email: e.target.value,
                    });
                  }}
                />
              </FormGroup>
              <FormGroup className="">
                <Form.Control
                  className="form-control"
                  placeholder="Password"
                  type="password"
                  name="password"
                  value={user.password}
                  onChange={(e) => {
                    setUser({
                      ...user,
                      password: e.target.value,
                    });
                  }}
                />
              </FormGroup>
              
              <p className="fs-6 text-secondary">
                
                Do not have an account yet? <Link className="text-decoration-none text-primary" to="/Signin">Sign up</Link>
              </p>
              <button>Sign In</button>
            </Form>
          </Row>
        </Col>
        {errMsg &&<p className="fs-6 text-secondary">{errMsg}</p>
          
          }
      </Row>
    </Container>
  );
};

export default Login
