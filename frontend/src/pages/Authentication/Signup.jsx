import { useState } from "react";
import { Row, Col, Container, Image, Form, FormGroup, Button } from "react-bootstrap";

const Signup = () => {
  const [user, setUser] = useState({
    name: '',
    email: '',
    password: '',
    confirmPassword: '',
  })

  return (
    <Container fluid>
      <Row className="">
        <Col className="grad vh-100 d-sm-flex d-none flex-column justify-content-center align-items-center">
          <Image src="../../../public/assets/signup.svg" className="" width={300} height={300} rounded />
          <h3 className="text-white">Public Opinion Matter</h3>
        </Col>
        <Col className="w-100 vh-100 px-md-4 px-lg-5 py-5">
          <Row className="py-5">
            <h1 className="mb-0 blue">Get Started Now!</h1>
            <h5 className="text-black-50">Creat Your Account Here</h5>
          </Row>
          <Row>
            <Form className="d-flex flex-column gap-4" onSubmit={() => {}}>
            <FormGroup className="">
              <Form.Control
                className="form-control"
                placeholder="Full name"
                type="text"
                name="name"
                value={user.name}
                onChange={(e) => {
                  setUser({
                    ...user,
                    name: e.target.value
                  })
                }}
              />
            </FormGroup>
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
                    email: e.target.value
                  })
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
                    password: e.target.value
                  })
                }}
              />
            </FormGroup>
            <FormGroup className="">
              <Form.Control
                className="form-control"
                placeholder="Confirm password"
                type="password"
                name="confirmPassword"
                value={user.confirmPassword}
                onChange={(e) => {
                  setUser({
                    ...user,
                    confirmPassword: e.target.value
                  })
                }}
              />
            </FormGroup>
            <Button className="fw-bold bg-blue" onClick={() => {}}>Sign Up</Button>
            </Form>
          </Row>
        </Col>
      </Row>
    </Container>
  );
};

export default Signup;
